"use client";
import React from "react";
import { FcBullish } from "react-icons/fc";
import { useAuth } from "../AuthContext";
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

export default function Sidebarr() {
    const { isAuthenticated, setIsAuthenticated } = useAuth();

    const handleSignOut = () => {
        localStorage.removeItem("token");
        window.location.href = "/admin/login";
        setIsAuthenticated(false);
    };
    return (
        <Sidebar aria-label="Sidebar with logo branding example">
            <Sidebar.Logo href="#" img="/logotr.svg" imgAlt="BookTour Logo">
                Book-Tour
            </Sidebar.Logo>
            <Sidebar.Items>
                {isAuthenticated === true && (
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
                    </Sidebar.ItemGroup>
                )}
                <Sidebar.ItemGroup>
                    {isAuthenticated ? (
                        <Sidebar.Item
                            onClick={handleSignOut}
                            icon={HiArrowSmRight}
                        >
                            Sign Out
                        </Sidebar.Item>
                    ) : (
                        <Sidebar.Item href="/admin/login" icon={HiArrowSmRight}>
                            Sign In
                        </Sidebar.Item>
                    )}
                </Sidebar.ItemGroup>
            </Sidebar.Items>
        </Sidebar>
    );
}
