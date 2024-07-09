import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home.vue";
import Signup from "@/views/Signup.vue";
import Login from "@/views/Login.vue";
import About from "@/views/About.vue";
import Patents from "@/views/Patents.vue";
import TechnologyTree from "@/views/TechnologyTree.vue";
import Researchers from "@/views/Researchers.vue";
import UserProfile from "@/views/UserProfile.vue";
import PatentPage from "@/views/PatentPage.vue";
import ResearchPage from "@/views/ResearchPage.vue";
import Dashboard from "@/views/Dashboard.vue";
import DashboardLibrary from "@/views/Dashboard/DashboardLibrary.vue";
import DashboardLibraryEditResearch from "@/views/Dashboard/DashboardLibraryEditResearch.vue";
import DashboardLibraryEditPatent from "@/views/Dashboard/DashboardLibraryEditPatent.vue";
import DashboardLibraryAddResearch from "@/views/Dashboard/DashboardLibraryAddResearch.vue";
import DashboardLibraryAddPatent from "@/views/Dashboard/DashboardLibraryAddPatent.vue";
import DashboardSettings from "@/views/Dashboard/DashboardSettings.vue";
const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/Signup",
        name: "Signup",
        component: Signup,
    },
    {
        path: "/Login",
        name: "Login",
        component: Login,
    },
    {
        path: "/About",
        name: "About",
        component: About,
    },
    {
        path: "/Patents",
        name: "Patents",
        component: Patents,
    },
    {
        path: "/TechnologyTree",
        name: "TechnologyTree",
        component: TechnologyTree,
    },
    {
        path: "/Researchers",
        name: "Researchers",
        component: Researchers,
    },
    {
        path: "/UserProfile",
        name: "UserProfile",
        component: UserProfile,
    },
    {
        path: "/PatentPage",
        name: "PatentPage",
        component: PatentPage,
    },
    {
        path: "/ResearchPage",
        name: "ResearchPage",
        component: ResearchPage,
    },
    {
        path: "/Dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
    {
        path: "/Dashboard/Library",
        name: "DashboardLibrary",
        component: DashboardLibrary,
    },
    {
        path: "/Dashboard/DashboardLibraryEditResearch",
        name: "DashboardLibraryEditResearch",
        component: DashboardLibraryEditResearch,
    },
    {
        path: "/Dashboard/DashboardLibraryEditPatent",
        name: "DashboardLibraryEditPatent",
        component: DashboardLibraryEditPatent,
    },
    {
        path: "/Dashboard/DashboardLibraryAddResearch",
        name: "DashboardLibraryAddResearch",
        component: DashboardLibraryAddResearch,
    },
    {
        path: "/Dashboard/DashboardLibraryAddPatent",
        name: "DashboardLibraryAddPatent",
        component: DashboardLibraryAddPatent,
    },
    {
        path: "/Dashboard/Settings",
        name: "DashboardSettings",
        component: DashboardSettings,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
