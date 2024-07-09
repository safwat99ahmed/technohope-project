const express = require("express");
const fs = require("fs");
const { google } = require("googleapis");
const multer = require("multer");
const cors = require("cors");

const app = express();

const storage = multer.diskStorage({
    destination: "uploads",
    filename: function (req, file, callback) {
        const extension = file.originalname.split(".").pop();
        callback(null, `${file.fieldname}-${Date.now()}.${extension}`);
    },
});
const upload = multer({ storage: storage });

app.use(cors());
app.post(
    "/DashboardLibraryAddPatent",
    upload.array("files"),
    async (req, res) => {
        try {
            const auth = new google.auth.GoogleAuth({
                keyFile: "apikeys.json",
                scopes: ["https://www.googleapis.com/auth/drive"],
            });
            const drive = google.drive({
                version: "v3",
                auth,
            });
            const uploadedFiles = [];

            for (let i = 0; i < req.files.length; i++) {
                const file = req.files[i];
                const response = await drive.files.create({
                    requestBody: {
                        name: file.originalname,
                        mimeType: file.mimeType,
                        parents: ["1jeCi87qj2Cd6ucEw0bRA3pgyYfhvFe1D"],
                    },
                    media: {
                        body: fs.createReadStream(file.path),
                    },
                });
                uploadedFiles.push(response.data);
            }
            res.json({ files: uploadedFiles });
        } catch (error) {
            console.log(error);
            res.status(500).json({ error: "An error occurred" });
        }
    }
);

app.listen(5000, () => {
    console.log("App is listening on port 5000");
});
