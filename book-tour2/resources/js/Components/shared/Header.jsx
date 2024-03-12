"use client";

import Link from "next/link";
import { Navbar } from "flowbite-react";
import { HiMiniArrowLeftOnRectangle } from "react-icons/hi2";

const pageName = function (props) {
    if (props.includes("/admin/products")) {
        return (
            <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
                Products
            </span>
        );
    } else if (props.includes("/admin/dashboard")) {
        return (
            <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
                Dashboard
            </span>
        );
    } else if (props.includes("/admin/customers")) {
        return (
            <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
                Customers
            </span>
        );
    } else if (props.includes("/admin/orders")) {
        return (
            <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
                Orders
            </span>
        );
    } else {
        return (
            <span className="self-center whitespace-nowrap text-xl font-semibold dark:text-white">
                Orders
            </span>
        );
    }
};

export default function Header() {
    const loc = window.location.href;
    return (
        <Navbar fluid rounded>
            <Navbar.Brand as={Link} href="/admin/dashboard">
                {pageName(window.location.href)}
                <img
                    src="/logotr.svg"
                    className="mr-3 h-6 sm:h-9 block md:hidden"
                    alt="Book-Tour logo"
                />
            </Navbar.Brand>
            <Navbar.Toggle />
            <Navbar.Collapse>
                <Navbar.Link href="/products" active>
                    <HiMiniArrowLeftOnRectangle />
                    <span>Visit Main Page</span>
                </Navbar.Link>
                <Navbar.Link
                    href="/admin/dashboard"
                    className="block md:hidden"
                    active
                >
                    <HiMiniArrowLeftOnRectangle />
                    <span>Dashboard</span>
                </Navbar.Link>
                <Navbar.Link
                    href="/admin/products"
                    className="block md:hidden"
                    active
                >
                    <HiMiniArrowLeftOnRectangle />
                    <span>Books</span>
                </Navbar.Link>
                <Navbar.Link
                    href="/admin/customers"
                    className="block md:hidden"
                    active
                >
                    <HiMiniArrowLeftOnRectangle />
                    <span>Customers</span>
                </Navbar.Link>
                <Navbar.Link
                    href="/admin/orders"
                    className="block md:hidden"
                    active
                >
                    <HiMiniArrowLeftOnRectangle />
                    <span>Orders</span>
                </Navbar.Link>
                <Navbar.Link
                    href="/admin/login"
                    className="block md:hidden"
                    active
                >
                    <HiMiniArrowLeftOnRectangle />
                    <span>Login</span>
                </Navbar.Link>
            </Navbar.Collapse>
        </Navbar>
    );
}
