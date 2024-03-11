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

export default function Component() {
    const loc = window.location.href;
    return (
        <Navbar fluid rounded>
            <Navbar.Brand as={Link} href="/admin/dashboard">
                {pageName(window.location.href)}
            </Navbar.Brand>
            <Navbar.Toggle />
            <Navbar.Collapse>
                <Navbar.Link href="/products" active>
                    <HiMiniArrowLeftOnRectangle />
                    <span>Visit Main Page</span>
                </Navbar.Link>
            </Navbar.Collapse>
        </Navbar>
    );
}
