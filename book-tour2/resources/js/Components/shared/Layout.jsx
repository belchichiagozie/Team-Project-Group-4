import React from "react";
import ReactDOM from "react-dom";
import SideBar from "./SideBar";
import Products from "../Products";
import LineChartComponent from "../Chart";
import BookStockChart from "../BookStockChart";

const header_text = "text-xl border border-solid bg-teal-200";
const page =
    "bg-neutral-100 overflow-auto h-screen w-screen bg-purple flex flex-col";
const chartsize = "relative h-64 w-96 border border-solid";

export default function Layout() {
    const loc = window.location.href;
    if (loc.includes("admin/products")) {
        return (
            <div className="flex justify-between flex-row">
                <div className="not(justify-between)">
                    <SideBar />
                </div>
                <div className={page}>
                    <div className={header_text}>Products</div>
                    <div className="p-4 shadow">
                        <Products />
                    </div>
                </div>
            </div>
        );
    } else if (loc.includes("dashboard")) {
        return (
            <div className="flex justify-between flex-row">
                <div className="not(justify-between)">
                    <SideBar />
                </div>
                <div className={page}>
                    <div className={header_text}>Dashboard</div>
                    <div className="flex flex-row">
                        <div className={chartsize}>
                            <BookStockChart />
                        </div>
                        <div className={chartsize}>
                            <LineChartComponent />
                        </div>
                    </div>
                    <div>
                        <div className="shadow">
                            <Products />
                        </div>
                    </div>
                </div>
            </div>
        );
    } else if (loc.includes("customers")) {
        return (
            <div className={page}>
                <SideBar />
                <div className={header}>
                    <div className={header_text}>Customers</div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Layout />, document.getElementById("layout"));
