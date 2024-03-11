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

const header_text = "text-xl border border-solid bg-teal-200";
const page = "bg-neutral-100 overflow-x-hidden h-screen w-[100%] flex flex-col";
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
            <div className="flex justify-between flex-row">
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
                        <div className="flex flex-row">
                            <div className={chartsize}>
                                <BookStockChart isLightMode={isLightMode} />
                            </div>
                            <div className={chartsize}>
                                <LineChartComponent isLightMode={isLightMode} />
                            </div>
                            <div>
                                <button onClick={toggleLightMode}>
                                    <DarkThemeToggle />
                                </button>
                            </div>
                        </div>
                        <div>
                            <div className="shadow min-w-0 w-max max-w-4xl">
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
