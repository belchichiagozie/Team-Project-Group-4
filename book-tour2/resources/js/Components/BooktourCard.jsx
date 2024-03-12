"use client";

import { Card } from "flowbite-react";

export default function BooktourCard() {
    return (
        <Card
            className="max-w-sm"
            imgAlt="Book-tour logo"
            imgSrc="/images/logo.png"
        >
            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Book Tour
            </h5>
            <p className="font-normal text-gray-700 dark:text-gray-400">
                Welcome Back!
            </p>
        </Card>
    );
}
