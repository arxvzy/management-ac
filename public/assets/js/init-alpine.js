function data() {
    function getThemeFromLocalStorage() {
        // if user already changed the theme, use it
        if (window.localStorage.getItem("dark")) {
            return JSON.parse(window.localStorage.getItem("dark"));
        }

        // else return their preferences
        return (
            !!window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        );
    }

    function setThemeToLocalStorage(value) {
        window.localStorage.setItem("dark", value);
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark;
            setThemeToLocalStorage(this.dark);
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false;
        },
    };
}

function searchableSelect(items, preselected = null) {
    return {
        search: preselected ? preselected.nama : "",
        selected: preselected,
        items: items,
        open: false,

        get filtered() {
            if (this.search === "") return this.items;
            return this.items.filter((item) =>
                item.nama.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        choose(item) {
            this.selected = item;
            this.search = item.nama;
            this.open = false;
        },

        closeLater() {
            setTimeout(() => {
                this.open = false;
            }, 150);
        },
    };
}
