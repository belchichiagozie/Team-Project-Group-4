import React from "react";
import ReactDOM from "react-dom";
import Sidebar from "./Sidebar";
import Products from "../Products";
import LineChartComponent from "../Chart";

export default function Layout() {
    const loc = window.location.href;
    if (loc.includes("admin/products")) {
        return (
            <div className="flex flex-row bg-neutral-100 h-screen w-screen overflow-hidden">
                <Sidebar />
                <div className="p-4">
                    <div className="text-xl">Products</div>
                    <Products />
                </div>
            </div>
        );
    } else if (loc.includes("dashboard")) {
        return (
            <div className="flex flex-row bg-neutral-100 h-screen w-screen overflow-hidden">
                <Sidebar />
                <div className="p-4">
                    <div className="text-xl">Dashboard</div>
                    <LineChartComponent />
                </div>
            </div>
        );
    } else if (loc.includes("customers")) {
        return (
            <div className="flex flex-row bg-neutral-100 h-screen w-screen overflow-hidden">
                <Sidebar />
                <div className="p-4">
                    <div className="text-xl">Customers</div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Layout />, document.getElementById("layout"));
