import React, { useState } from "react";
import ReactDOM from "react-dom";
import SideBar from "./SideBar";
import Products from "../Products";
import LineChartComponent from "../Chart";
import BookStockChart from "../BookStockChart";
import Header from "./Header";
import AddBookButton from "../AddBookButton";
import { Flowbite, DarkThemeToggle } from "flowbite-react";

const header_text = "text-xl border border-solid bg-teal-200";
const page =
    "bg-neutral-100 overflow-x-hidden h-screen w-[100%] text-white flex flex-col";
const chartsize = "relative h-64 w-96 border border-solid";

export default function Layout() {
    const loc = window.location.href;
    const [isLightMode, setIsLightMode] = useState(false);

    const toggleLightMode = () => {
        setIsLightMode(!isLightMode);
    };
    const pageStyle = `${page} ${isLightMode ? "bg-white text-black" : "bg-[#106585] text-white"}`;
    if (loc.includes("admin/products")) {
        return (
            <div className="flex justify-between flex-row">
                <Flowbite>
                    <div className="not(justify-between)">
                        <SideBar />
                    </div>
                    <div className={pageStyle} id="prods">
                        <div>
                            <Header />
                        </div>
                        <div className="p-4 shadow">
                            <Products />
                            <AddBookButton />
                        </div>
                        <div>
                            <button onClick={toggleLightMode}>
                                <DarkThemeToggle />
                            </button>
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
                        <SideBar />
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
                            <div className="shadow">
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
                <SideBar />
                <div className={page}>
                    <div className={header_text}>Customers</div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Layout />, document.getElementById("layout"));
