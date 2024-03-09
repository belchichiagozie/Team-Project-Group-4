"use client";

import Link from "next/link";
import { Navbar } from "flowbite-react";

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
            <Navbar.Brand as={Link} href="https://flowbite-react.com">
                {pageName(window.location.href)}
            </Navbar.Brand>
            <Navbar.Toggle />
            <Navbar.Collapse>
                <Navbar.Link href="#" active>
                    Home
                </Navbar.Link>
                <Navbar.Link as={Link} href="#">
                    About
                </Navbar.Link>
                <Navbar.Link href="#">Services</Navbar.Link>
                <Navbar.Link href="#">Pricing</Navbar.Link>
                <Navbar.Link href="#">Contact</Navbar.Link>
            </Navbar.Collapse>
        </Navbar>
    );
}
