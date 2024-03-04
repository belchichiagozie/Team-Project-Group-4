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
} from "react-icons/hi";

const sideItem =
    "flex items-center text-xl gap-2 font-light px-3 py-2 hover:bg-neutral-700 hover:no-underline active:bg-neutral-600 rounded-sm text-base";

export default function Sidebar() {
    return (
        <div className="flex gap-10 flex-col w-60 p-3 bg-neutral-900 text-white">
            <div className="flex items-center gap-2 px-1 py-3">
                <FcBullish />
                <span className="text-neutral-100 text-lg">Book-Tour</span>
            </div>

            <div className="flex flex-col flex-1 gap-2">
                <a href="/admin/dashboard">
                    <div className={sideItem}>
                        Dashboard
                        <span>
                            <HiOutlineViewGrid />
                        </span>
                    </div>
                </a>
                <a href="/admin/products">
                    <div className={sideItem}>
                        Products
                        <span>
                            <HiOutlineCube />
                        </span>
                    </div>
                </a>
                <a href="/admin/customers">
                    <div className={sideItem}>
                        Customers
                        <span>
                            <HiOutlineUsers />
                        </span>
                    </div>
                </a>
                <a href="/admin/orders">
                    <div className={sideItem}>
                        Orders
                        <span>
                            <HiOutlineShoppingCart />
                        </span>
                    </div>
                </a>
                <a href="/admin/dashboard">
                    <div className={sideItem}>
                        Analytics
                        <span>
                            <HiChartPie />
                        </span>
                    </div>
                </a>
            </div>
            <div>
                <div className={sideItem}>Settings</div>
                <div className={sideItem}>Help & Support</div>
                <div className={sideItem}>Logout</div>
            </div>
        </div>
    );
}
