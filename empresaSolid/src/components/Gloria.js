import React from "react"
import {TypeAnimation} from "react-type-animation"
import FotoGloria from "../assets/Gloria.png"
import FotoHabilidadesG from "../assets/habilidades-gloria.png"
import Projeto1 from '../assets/gm.design.png'
import Projeto2 from '../assets/gm.design2.png'
import Like from './Like'

const Gloria = () => {
    return(
        <div>
            <main className="portifolio">
                <div className="quem-sou-eu">
                    <div>
                        <h1>
                            Meu nome é Glória Maria e eu sou
                        </h1>
                        <h1 className="titulo-animado">
                            <TypeAnimation sequence={['Designer', 2000]} speed={50} />
                        </h1>
                    </div>
                    <div className="foto">
                       <img src={FotoGloria}/>
                    </div>
                </div>
                <div className="habilidades">
                <h2>No momento estou concluindo um curso de técnico em informática e um curso da Dell de Assistência Técnica</h2>
                    <h2>
                    Algumas dos softwares de edição de imagens que eu possuo experiência incluem
                        <TypeAnimation sequence={[' Canva', 2000, ' Photoshop', 2000, ' Figma', 2000, ' Inkscape', 2000,]} speed={50} repeat={Infinity}/> </h2>
                    <img src={FotoHabilidadesG} className="img-tech"/>
                </div>
                <div className="projetos">
                    <h1>Projetos recentes</h1>
                    <div className="projeto">
                        <div className="info">
                            <h2>Identidade visual desenvolvida para Carlas Rodríguez</h2>
                            <p>Identidade visual que foi desenvolvida de acordo com a empresa e suas necessidades de marketing em atingir o público alvo.</p>
                        </div>
                        <img src={Projeto2}/>
                    </div>
                    <div className="projeto">
                        <div className="info">
                            <h2>Post para Instagram para empresa de negócios</h2>
                            <p>Post bem chamativo feito para dar um vislumbre sobre as possibilidades de negócio e um possível fechamento de contrato.</p>
                        </div>
                        <img src={Projeto1}/>
                    </div>
                </div>
                <div className="curtidas">
                    <Like texto="Like"/>
                    <Like texto="Deslike"/>
                </div>
            </main>
        </div>
    )
}

export default Gloria