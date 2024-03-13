import React from "react";

function LeftSide() {
    return (
        <div className="flex justify-center border border-solid border-2 rounded-2xl items-center w-max sm:w-36 md:w-52 lg:w-96 dark:bg-cyan-700">
            <div className="text-3xl p-2 dark:text-white flex justify-center items-center">
                Welcome Back!
            </div>
        </div>
    );
}

export default function Login() {
    return (
        <div className="flex font-bold flex-row rounded-2xl inset-20 shadow-[rgba(0,0,15,0.5)_10px_5px_4px_0px]">
            <div className="hidden md:block">
                <LeftSide />
            </div>

            <form className=" dark:bg-slate-800 rounded-2xl w-max sm:w-36 md:w-52 lg:w-96 border border-solid border-2  flex max-w-2xl flex-col gap-4 text-black">
                <div className="p-8 text-3xl dark:text-white flex flex-col justify-center items-center">
                    <img
                        className="w-40 h-40"
                        src="/images/logotr.png"
                        alt="Book-tour logo"
                    />
                    <span className="flex flex-col justify-center items-center">
                        <h1>Book-Tour:</h1>
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
                        id="email1"
                        type="email"
                        className="form-input"
                        placeholder="name@email.com"
                        required
                    />
                </div>
                <div className="pb-8 px-8 flex flex-col justify-center">
                    <div className="mb-2 block dark:text-white">
                        <label htmlFor="password1" className="form-label">
                            Your password
                        </label>
                    </div>
                    <input
                        id="password1"
                        type="password"
                        className="form-input"
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
