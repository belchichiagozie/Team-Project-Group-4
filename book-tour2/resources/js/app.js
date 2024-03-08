import "./bootstrap";
import "../css/app.css";
import("./components/AdminPage");
import("./components/Counter");
import("./components/shared/Layout");
import("./components/shared/SideBar");
import("./components/Dashboard");
import("./components/Products");
import("./components/Chart");
import("./components/BookStockChart");
import("./components/BinButton");
import("./components/EditBook");
import("./components/FavouriteButton");
import("./components/AddBookButton");

import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";

const appName = import.meta.env.MIX_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: "#4B5563",
    },
});
