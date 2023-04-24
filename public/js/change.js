let themes = document.getElementsByTagName("link");

if (localStorage.theme == "dark.css") {
    for (let i = 0; i < themes.length; i++) {
        themes[i].href = themes[i].href.replace('light.css', 'dark.css');
    }
}

function changeTheme() {
    let themes = document.getElementsByTagName("link");
    for (let i = 0; i < themes.length; i++) {
        let atr = themes[i].getAttribute("href");
        if (atr.includes("light.css")) {
            themes[i].href = themes[i].href.replace('light.css', 'dark.css');
            localStorage.theme = "dark.css";
        }
        else {
            themes[i].href = themes[i].href.replace('dark.css', 'light.css');
            localStorage.theme = "light.css";
        }

    }
}