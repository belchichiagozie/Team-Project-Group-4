"use client";
import React from "react";
import { FcBullish } from "react-icons/fc";
import {
    HiOutlineViewGrid,
    HiOutlineCube,
    HiOutlineShoppingCart,
    HiOutlineUsers,
    HiChartPie,
    HiOutlineDocumentText,
    HiOutlineAnnotation,
    HiOutlineQuestionMarkCircle,
    HiOutlineCog,
    HiArrowSmRight,
    HiInbox,
    HiShoppingBag,
    HiTable,
    HiUser,
    HiViewBoards,
    HiOutlineBookOpen,
} from "react-icons/hi";

import { Sidebar } from "flowbite-react";

const sideItem =
    "flex items-center text-xl gap-2 font-light px-3 py-2 hover:bg-neutral-700 hover:no-underline active:bg-neutral-600 rounded-sm text-base whitespace-nowrap overflow-clip";

const bottoms =
    "flex flex-col gap-0.5 pt-2 border-t border-neutral-700 shrink-0";

export default function SideBar() {
    return (
        // <div className="h-screen flex gap-10 flex-col bg-neutral-900 w-1/6 p-3 text-white">
        //     <div className="flex items-center gap-2 px-1 py-3">
        //         <FcBullish />
        //         <span className="text-neutral-100 text-lg">Book-Tour</span>
        //     </div>

        //     <div className="flex flex-col flex-1 gap-2">
        //         <a href="/admin/dashboard">
        //             <div className={sideItem}>
        //                 Dashboard
        //                 <span>
        //                     <HiOutlineViewGrid />
        //                 </span>
        //             </div>
        //         </a>
        //         <a href="/admin/products">
        //             <div className={sideItem}>
        //                 Products
        //                 <span>
        //                     <HiOutlineCube />
        //                 </span>
        //             </div>
        //         </a>
        //         <a href="/admin/customers">
        //             <div className={sideItem}>
        //                 Customers
        //                 <span>
        //                     <HiOutlineUsers />
        //                 </span>
        //             </div>
        //         </a>
        //         <a href="/admin/orders">
        //             <div className={sideItem}>
        //                 Orders
        //                 <span>
        //                     <HiOutlineShoppingCart />
        //                 </span>
        //             </div>
        //         </a>
        //         <a href="/admin/dashboard">
        //             <div className={sideItem}>
        //                 Analytics
        //                 <span>
        //                     <HiChartPie />
        //                 </span>
        //             </div>
        //         </a>
        //     </div>
        //     <div>
        //         <div className={bottoms}>Settings</div>
        //         <div className={bottoms}>Help & Support</div>
        //         <div className={bottoms}>Logout</div>
        //     </div>
        // </div>
        <Sidebar aria-label="Sidebar with logo branding example">
            <Sidebar.Logo href="#" img="/logo.svg" imgAlt="BookTour Logo">
                Book-Tour
            </Sidebar.Logo>
            <Sidebar.Items>
                <Sidebar.ItemGroup>
                    <Sidebar.Item href="/admin/dashboard" icon={HiChartPie}>
                        Dashboard
                    </Sidebar.Item>
                    <Sidebar.Item
                        href="/admin/products"
                        icon={HiOutlineBookOpen}
                    >
                        Books
                    </Sidebar.Item>
                    <Sidebar.Item href="/admin/customers" icon={HiInbox}>
                        Customers
                    </Sidebar.Item>
                    <Sidebar.Item
                        href="/admin/orders"
                        icon={HiOutlineShoppingCart}
                    >
                        Orders
                    </Sidebar.Item>
                    <Sidebar.Item href="#" icon={HiArrowSmRight}>
                        Sign In
                    </Sidebar.Item>
                    <Sidebar.Item href="#" icon={HiTable}>
                        Sign Up
                    </Sidebar.Item>
                </Sidebar.ItemGroup>
            </Sidebar.Items>
        </Sidebar>
    );
}
