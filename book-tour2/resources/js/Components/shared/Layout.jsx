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
import Users from "../Users";
import { AuthProvider } from "../AuthContext";

const header_text = "text-xl border border-solid bg-teal-200";
const page = "bg-neutral-100 overflow-x-hidden w-full h-screen flex flex-col";
const chartsize =
    "h-64 w-96 min-w-0 border rounded-lg border-solid mx-2 sm:mx-4 md:mx-6 lg:mx-8";
const loginpage =
    "bg-neutral-100 overflow-x-hidden w-full h-full flex grow items-center justify-center dark:bg-slate-50 dark:text-white";
const pageCenter = " flex justify-center w-max border border-solid border-4 ";

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
            <AuthProvider>
                <div className="flex justify-between flex-row overflow-x-hidden">
                    <Flowbite>
                        <div className="hidden md:block not(justify-between)">
                            <Sidebarr />
                        </div>
                        <div className={pageStyle} id="prods">
                            <div className="">
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
            </AuthProvider>
        );
    } else if (loc.includes("dashboard")) {
        return (
            <AuthProvider>
                <div className="flex justify-between flex-row">
                    <Flowbite>
                        <div className="hidden md:block not(justify-between)">
                            <Sidebarr />
                        </div>
                        <div className={pageStyle}>
                            <div className="">
                                <Header />
                            </div>
                            <div className="flex flex-row flex-wrap items-center justify-center xl:justify-between">
                                <div className="py-2 pl-4 xl:pl-8 px-4">
                                    <BooksCard />
                                </div>
                                <div className="py-2 xs:pl-20 px-4">
                                    <UsersCard />
                                </div>

                                <div className="py-2 xs:pl-20 px-4">
                                    <BooksCard />
                                </div>
                                <div className="py-2 pr-4 xl:pr-8 px-4">
                                    <UsersCard />
                                </div>
                            </div>
                            <div className="flex min-w-0 flex-row flex-wrap items-center justify-center p-2">
                                <div className={chartsize}>
                                    <BookStockChart isLightMode={isLightMode} />
                                </div>
                                <div className={chartsize}>
                                    <LineChartComponent
                                        isLightMode={isLightMode}
                                    />
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
                            <div className="flex flex-col xl:flex-row p-2 items-center justify-center">
                                <div className="shadow w-max max-w-4xl xl:px-2 pb-4">
                                    <Products />
                                </div>
                                <div className="shadow w-max max-w-4xl xl:px-2">
                                    <Users />
                                </div>
                            </div>
                        </div>
                    </Flowbite>
                </div>
            </AuthProvider>
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
            <AuthProvider>
                <div className="flex justify-between flex-row">
                    <Flowbite>
                        <div className="hidden md:block not(justify-between)">
                            <Sidebarr />
                        </div>
                        <div className={pageStyle} id="prods">
                            <div>
                                <Header />
                            </div>
                            <div className={loginpage}>
                                <Login />
                            </div>
                        </div>
                    </Flowbite>
                </div>
            </AuthProvider>
        );
    }
}

ReactDOM.render(<Layout />, document.getElementById("layout"));
