import React, { useState } from "react";
import axios from "axios";
import { useAuth } from "./AuthContext";

function LeftSide() {
    return (
        <div className="border border-solid border-2 rounded-2xl w-max hidden sm:block sm:flex sm:items-center sm:justify-center sm:w-64 md:w-64 lg:w-96 dark:bg-cyan-700">
            <div className="text-3xl p-2 dark:text-white flex justify-center items-center">
                Welcome Back!
            </div>
        </div>
    );
}

export default function Login() {
    const { isAuthenticated, setIsAuthenticated } = useAuth();
    if (isAuthenticated) {
        window.location.href = "/admin/dashboard";
    }
    const { login } = useAuth();
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post("/api/admin/login", {
                Email: email,
                Passkey: password,
            });
            const token = response.data.token;
            localStorage.setItem("token", token);
            login();
            console.log("Login successful", response.data);
            window.location.href = "/admin/dashboard";
        } catch (error) {
            if (error.response) {
                console.error("Login error", error.response.data);
                alert("Incorrect Login Details");
            } else if (error.request) {
                console.error("Login error", error.request);
            } else {
                console.error("Error", error.message);
            }
        }
    };
    return (
        <div className="flex font-bold flex-row rounded-2xl inset-20 shadow-[rgba(0,0,15,0.5)_10px_5px_4px_0px]">
            <LeftSide />

            <form
                className="dark:bg-slate-800 rounded-2xl w-max sm:w-64 md:w-64 lg:w-96 border border-solid border-2  flex max-w-2xl flex-col gap-4 text-black"
                onSubmit={handleSubmit}
            >
                <div className="p-8 text-3xl dark:text-white flex flex-col justify-center items-center">
                    <img
                        className="w-40 h-40"
                        src="/images/logotr.png"
                        alt="Book-tour logo"
                    />
                    <span className="flex flex-col justify-center items-center">
                        <h1>BookTour:</h1>
                        <span className="text-xs">Admin</span>
                    </span>
                </div>
                <div className="p-8 flex flex-col justify-center">
                    <div className="mb-2 block dark:text-white">
                        <label htmlFor="email1" className="form-label">
                            Your email
                        </label>
                    </div>
                    <input
                        id="email"
                        type="email"
                        className="form-input"
                        placeholder="name@email.com"
                        required
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                    />
                </div>
                <div className="pb-8 px-8 flex flex-col justify-center">
                    <div className="mb-2 block dark:text-white">
                        <label htmlFor="password1" className="form-label">
                            Your password
                        </label>
                    </div>
                    <input
                        id="password"
                        type="password"
                        className="form-input"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <div className="flex items-center justify-center gap-2">
                    <input
                        id="remember"
                        type="checkbox"
                        className="form-checkbox"
                    />
                    <label
                        htmlFor="remember"
                        className="dark:text-white form-label"
                    >
                        Remember me
                    </label>
                </div>
                <div className="flex items-center justify-center  p-2">
                    <button
                        type="submit"
                        className="w-max bg-[#b2cdd8] rounded-lg dark:text-black border border-solid p-2 submit-button"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    );
}
