import React from 'react';
import { Link } from 'react-router-dom';

const Menu = ({imagem}) => {
    return (
        <div>
            <header>
                <div className="logo">
                    <img src={imagem} />
                </div>
                <nav>
                    <p>
                        <Link to="/">Serviços</Link>
                    </p>
                    <p>
                        <Link to="/contact">Contato</Link>
                    </p>
                    <p>
                        <Link to="/quem-somos">Quem somos</Link>
                    </p>
                    <p>
                        <Link to="/portifolio-guilherme">Guilherme Chaves</Link>
                    </p>
                    <p>
                        <Link to="/portifolio-gloria">Glória Maria</Link>
                    </p>
                </nav>
            </header>
        </div>
    )
}

export default Menu