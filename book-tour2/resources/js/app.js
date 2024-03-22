import "./bootstrap";
import "../css/app.css";
import("./Components/AdminPage");
import("./Components/Counter");
import("./Components/shared/Layout");
import("./Components/shared/Sidebarr");
import("./Components/Dashboard");
import("./Components/Products");
import("./Components/Chart");
import("./Components/BookStockChart");
import("./Components/BinButton");
import("./Components/EditBook");
import("./Components/FavouriteButton");
import("./Components/AddBookButton");
import("./Components/shared/Header");
import("./Components/Login");
import("./Components/BookSalesChart");
import("./Components/BooksCard");
import("./Components/UsersCard");
import("./Components/OrdersCard");
import("./Components/SalesCard");
import("./Components/Users");
import("./Components/BooktourCard");
import("./Components/AuthContext");
import("./Components/Orders");

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
