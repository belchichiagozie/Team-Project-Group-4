"use client";

import { Button, Label, Modal, TextInput } from "flowbite-react";
import { useState } from "react";
import { IconButton } from "rsuite";
import { HiOutlinePencil } from "react-icons/hi";

export default function EditBookButton({ bookObj }) {
    const [openModal, setOpenModal] = useState(false);
    const [title, setTitle] = useState(bookObj.Title);
    const [author, setAuthor] = useState(bookObj.Author);
    const [genre, setGenre] = useState(bookObj.Genre);
    const [price, setPrice] = useState(bookObj.Price);
    const [stock, setStock] = useState(bookObj.Stock);

    function onCloseModal() {
        setOpenModal(false);
        setEmail("");
    }

    return (
        <>
            <IconButton
                icon={<HiOutlinePencil />}
                onClick={() => setOpenModal(true)}
            />
            <Modal show={openModal} size="md" onClose={onCloseModal} popup>
                <Modal.Header />
                <Modal.Body>
                    <div className="space-y-6">
                        <h3 className="text-xl font-medium text-gray-900 dark:text-white">
                            Book Details
                        </h3>
                        <div>
                            <div className="mb-2 block">
                                <Label htmlFor="title" value="Book Title" />
                            </div>
                            <TextInput
                                id="Title"
                                placeholder={bookObj.Title}
                                value={title}
                                onChange={(event) =>
                                    setTitle(event.target.value)
                                }
                                required
                            />
                        </div>
                        <div>
                            <div className="mb-2 block">
                                <Label htmlFor="author" value="Author" />
                            </div>
                            <TextInput
                                id="author"
                                placeholder={bookObj.Author}
                                value={author}
                                onChange={(event) =>
                                    setAuthor(event.target.value)
                                }
                                required
                            />
                        </div>
                        <div>
                            <div className="mb-2 block">
                                <Label htmlFor="genre" value="Genre" />
                            </div>
                            <TextInput
                                id="genre"
                                placeholder={bookObj.Genre}
                                value={genre}
                                onChange={(event) =>
                                    setGenre(event.target.value)
                                }
                                required
                            />
                        </div>
                        <div>
                            <div className="mb-2 block">
                                <Label htmlFor="price" value="Price" />
                            </div>
                            <TextInput
                                id="price"
                                placeholder={bookObj.Price}
                                value={genre}
                                onChange={(event) =>
                                    setPrice(event.target.value)
                                }
                                required
                            />
                        </div>
                        <div>
                            <div className="mb-2 block">
                                <Label htmlFor="stock" value="Stock" />
                            </div>
                            <TextInput
                                id="stock"
                                placeholder={bookObj.Stock}
                                value={stock}
                                onChange={(event) =>
                                    setStock(event.target.value)
                                }
                                required
                            />
                        </div>

                        <div className="w-full">
                            <Button onClick={() => setOpenModal(false)}>
                                Edit
                            </Button>
                        </div>
                    </div>
                </Modal.Body>
            </Modal>
        </>
    );
}
