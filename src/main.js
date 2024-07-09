import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./index.css";

createApp(App).use(store).use(router).mount("#app");

// flowbite functionality
import { onMounted } from "vue";
import {
    initAccordions,
    initCarousels,
    initCollapses,
    initDials,
    initDismisses,
    initDrawers,
    initDropdowns,
    initModals,
    initPopovers,
    initTabs,
    initTooltips,
} from "flowbite";

// initialize components based on data attribute selectors
onMounted(() => {
    initAccordions();
    initCarousels();
    initCollapses();
    initDials();
    initDismisses();
    initDrawers();
    initDropdowns();
    initModals();
    initPopovers();
    initTabs();
    initTooltips();
});

// var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
// var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// // Change the icons inside the button based on previous settings
// if (
//     localStorage.getItem("color-theme") === "dark" ||
//     (!("color-theme" in localStorage) &&
//         window.matchMedia("(prefers-color-scheme: dark)").matches)
// ) {
//     themeToggleLightIcon.classList.remove("hidden");
// } else {
//     themeToggleDarkIcon.classList.remove("hidden");
// }

// var themeToggleBtn = document.getElementById("theme-toggle");
// var AppLogo = document.getElementById("AppLogo");
// var DarkAppLogo = document.getElementById("DarkAppLogo");

// themeToggleBtn.addEventListener("click", function () {
//     // toggle icons inside button
//     AppLogo.classList.toggle("hidden");
//     DarkAppLogo.classList.toggle("hidden");
//     themeToggleDarkIcon.classList.toggle("hidden");
//     themeToggleLightIcon.classList.toggle("hidden");

//     // if set via local storage previously
//     if (localStorage.getItem("color-theme")) {
//         if (localStorage.getItem("color-theme") === "light") {
//             document.documentElement.classList.add("dark");
//             localStorage.setItem("color-theme", "dark");
//         } else {
//             document.documentElement.classList.remove("dark");
//             localStorage.setItem("color-theme", "light");
//         }

//         // if NOT set via local storage previously
//     } else {
//         if (document.documentElement.classList.contains("dark")) {
//             document.documentElement.classList.remove("dark");
//             localStorage.setItem("color-theme", "light");
//         } else {
//             document.documentElement.classList.add("dark");
//             localStorage.setItem("color-theme", "dark");
//         }
//     }
// });
