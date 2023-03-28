import { useState } from "react"

const Like = ({texto}) => {
    const [likes, setLikes] = useState(0)

    function addLike(){
        setLikes(likes + 1)
    }

    return(
        <div className="curti-descurti">
            <h1>{texto}s</h1>
            <h2>{likes}</h2>
            <button onClick={addLike}>{texto}</button>
        </div>
    )
}

export default Like