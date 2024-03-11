import React, { useState } from "react";
import ReactDOM from "react-dom";
import Sidebarr from "./Sidebarr";
import Products from "../Products";
import LineChartComponent from "../Chart";
import BookStockChart from "../BookStockChart";
import Header from "./Header";
import AddBookButton from "../AddBookButton";
import { Flowbite, DarkThemeToggle } from "flowbite-react";
import Login from "../Login";
import BookSalesChart from "../BookSalesChart";
import BooksCard from "../BooksCard";
import UsersCard from "../UsersCard";

const header_text = "text-xl border border-solid bg-teal-200";
const page = "bg-neutral-100 overflow-x-hidden w-full h-screen flex flex-col";
const chartsize = "relative h-64 w-96 min-w-0 border rounded-lg border-solid";

export default function Layout() {
    const loc = window.location.href;
    const [isLightMode, setIsLightMode] = useState(false);

    const toggleLightMode = () => {
        setIsLightMode(!isLightMode);
    };
    // const pageStyle = `${page} ${isLightMode ? "bg-white text-black" : "bg-[#106582] text-white"}`;
    const pageStyle = `${page} dark:bg-cyan-700 dark:text-white`;
    if (loc.includes("admin/products")) {
        return (
            <div className="flex justify-between flex-row overflow-x-hidden">
                <Flowbite>
                    <div className="not(justify-between)">
                        <Sidebarr />
                    </div>
                    <div className={pageStyle} id="prods">
                        <div>
                            <Header />
                        </div>

                        <div className="p-4 w-max max-w-3xl shadow dark:text-white">
                            <Products />

                            <AddBookButton />
                        </div>
                        <div>
                            <DarkThemeToggle />
                        </div>
                    </div>
                </Flowbite>
            </div>
        );
    } else if (loc.includes("dashboard")) {
        return (
            <div className="flex justify-between flex-row">
                <Flowbite>
                    <div className="not(justify-between)">
                        <Sidebarr />
                    </div>
                    <div className={pageStyle}>
                        <div>
                            <Header />
                        </div>
                        <div className="flex flex-row justify-between">
                            <div className="p-2">
                                <BooksCard />
                            </div>
                            <div className="p-2">
                                <UsersCard />
                            </div>
                            <div className="p-2">
                                <BooksCard />
                            </div>
                            <div className="p-2">
                                <UsersCard />
                            </div>
                        </div>
                        <div className="flex flex-row justify-between p-2">
                            <div className={chartsize}>
                                <BookStockChart isLightMode={isLightMode} />
                            </div>
                            <div className={chartsize}>
                                <LineChartComponent isLightMode={isLightMode} />
                            </div>
                            <div className={chartsize}>
                                <BookSalesChart isLightMode={isLightMode} />
                            </div>
                            <div>
                                <button onClick={toggleLightMode}>
                                    <DarkThemeToggle />
                                </button>
                            </div>
                        </div>
                        <div className="flex flex-row p-2">
                            <div className="shadow max-w-4xl">
                                <Products />
                            </div>
                        </div>
                    </div>
                </Flowbite>
            </div>
        );
    } else if (loc.includes("customers")) {
        return (
            <div className={page}>
                <Sidebarr />
                <div className={page}>
                    <div className={header_text}>Customers</div>
                </div>
            </div>
        );
    } else if (loc.includes("/admin/login")) {
        return (
            <div className="flex justify-between flex-row">
                <Flowbite>
                    <div className="not(justify-between)">
                        <Sidebarr />
                    </div>
                    <div className={pageStyle} id="prods">
                        <div>
                            <Login />
                        </div>
                    </div>
                </Flowbite>
            </div>
        );
    }
}

ReactDOM.render(<Layout />, document.getElementById("layout"));
