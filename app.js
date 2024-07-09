const express = require("express");
const OAuth2Data = require("./clientkey.json");
const { google } = require("googleapis");
const multer = require("multer");
const fs = require("fs");

//var title, description;
const app = express();
const upload = multer({ dest: "upload/" });

//handal the authentication
const CLIENT_ID = OAuth2Data.web.clint_id;
const CLIENT_SECRET = OAuth2Data.web.client_secret;
const REDIRECT_URL = OAuth2Data.web.redirect_uris[0];

const oAuth2Client = new google.auth.OAuth2(
    CLIENT_ID,
    CLIENT_SECRET,
    REDIRECT_URL
);

var authed = false;
var scopes = "https://www.googleapis.com/auth/youtube.upload";

app.get("/", (req, res) => {
    if (!authed) {
        // generate an OAuth url
        var url = oAuth2Client.generateAuthUrl({
            access_type: "offline",
            scope: scopes,
        });
        res.render("./src/views/Dashboard/DashboardLibraryAddPatent.vue", {
            url,
        });
    }
});
app.get("/upload", (req, res) => {
    const code = req.query.code;
    if (code) {
        oAuth2Client.getToken(code, function (err, tokens) {
            if (err) throw err;
            console.log("successfully authenticated");
            oAuth2Client.setCredentials(tokens);
            authed = true;
            res.redirect("/");
        });
    }
});

// Configure Google API client
const youtube = google.youtube({
    version: "v3",
    auth: "keys.json",
});

// Route to handle file upload
app.post("/upload", upload.single("video"), async (req, res) => {
    try {
        // Read the video file
        const videoData = fs.readFileSync(req.file.path);

        // Upload video to YouTube
        const response = await youtube.videos.insert({
            part: "snippet,status",
            requestBody: {
                snippet: {
                    title: "My video title",
                    description: "Description of my video",
                    //tags: ['tag1', 'tag2']
                },
                status: {
                    privacyStatus: "private", // or 'public' or 'unlisted'
                },
            },
            media: {
                body: videoData,
            },
        });

        // Delete the temporary file
        fs.unlinkSync(req.file.path);

        res.json({ success: true, videoId: response.data.id });
    } catch (err) {
        console.error("Error uploading video:", err);
        res.status(500).json({ error: "Failed to upload video" });
    }
});

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
