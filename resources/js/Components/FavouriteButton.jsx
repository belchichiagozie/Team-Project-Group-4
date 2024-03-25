import React, { useState, useEffect } from "react";
import { IconButton } from "rsuite";
import { HiOutlineHeart, HiHeart } from "react-icons/hi";

export default function FavouriteButton({ id }) {
    const [isFavourite, setIsFavourite] = useState(false);

    useEffect(() => {
        setIsFavourite(id === 1);
    }, [id]);
    const toggleFavourite = () => setIsFavourite(!isFavourite);

    return (
        <IconButton
            icon={isFavourite ? <HiHeart /> : <HiOutlineHeart />}
            onClick={toggleFavourite}
            appearance="subtle"
        />
    );
}
