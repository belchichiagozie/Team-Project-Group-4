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
                <div className={sideItem}>
                    <a href="/admin/dashboard">Dashboard </a>
                    <span>
                        <HiOutlineViewGrid />
                    </span>
                </div>
                <div className={sideItem}>
                    <a href="/admin/products">Products</a>
                    <span>
                        <HiOutlineCube />
                    </span>
                </div>
                <div className={sideItem}>
                    <a href="/admin/customers">Customers</a>
                    <span>
                        <HiOutlineUsers />
                    </span>
                </div>
                <div className={sideItem}>
                    Orders
                    <span>
                        <HiOutlineShoppingCart />
                    </span>
                </div>
                <div className={sideItem}>
                    Analytics
                    <span>
                        <HiChartPie />
                    </span>
                </div>
            </div>
            <div>BOTTOM</div>
        </div>
    );
}
