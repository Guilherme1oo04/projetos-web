import React from "react"
import {TypeAnimation} from "react-type-animation"
import FotoGuilherme from "../assets/Guilherme.png"
import Tech1 from "../assets/tech1.png"
import Tech2 from "../assets/tech2.png"
import SiteLivros from "../assets/site-biblioteca.png"
import Dashboard from "../assets/dashNba.png"
import AudioDown from "../assets/audioDownloader.png"

const Guilherme = () => {
    return(
        <div>
            <main className="portifolio">
                <div className="quem-sou-eu">
                    <div>
                        <h1>
                            Meu nome é Guilherme Chaves e eu sou
                        </h1>
                        <h1 className="titulo-animado">
                            <TypeAnimation sequence={['Desenvolvedor Full Stack', 2000]} speed={50} />
                        </h1>
                    </div>
                    <div className="foto">
                       <img src={FotoGuilherme}/>
                    </div>
                </div>
                <div className="habilidades">
                    <h2>
                    Algumas das linguagens que eu já utilizei incluem
                        <TypeAnimation sequence={[' HTML', 2000, ' CSS', 2000, ' JS', 2000, ' PHP', 2000, ' MySql', 2000, ' Python', 2000]} speed={50} repeat={Infinity}/> </h2>
                    <img src={Tech1} className="img-tech"/>
                    <h2>Já utilizei bibliotecas da linguagem Python para desenvolver alguns projetos. Entre elas estão o TkInter, Dash, Pandas e PyTube</h2>
                    <h2>Possuo conhecimento básico em React e em Git</h2>
                    <img src={Tech2} className="img-tech"/>
                </div>
                <div className="projetos">
                    <h1>Projetos recentes</h1>
                    <div className="projeto">
                        <div className="info">
                            <h2>Website para biblioteca escolar</h2>
                            <p>Este projeto consiste em um software feito para ser utilizado para o agendamento de livros, consulta do acervo e administração da biblioteca.</p>
                            <a href="https://github.com/Guilherme1oo04/projetos-web/tree/main/site-biblioteca" target={"_blank"}>Projeto no Github</a>
                        </div>
                        <img src={SiteLivros}/>
                    </div>
                    <div className="projeto">
                        <div className="info">
                            <h2>Dashboard sobre os maiores pontuadores da NBA</h2>
                            <p>Eu sou um grande fã de basquete e resolvi colocar esse mundo junto com a programação, esse projeto é um Dashboard dos maiores pontuadores com informações sobre eles.</p>
                            <a href="https://github.com/Guilherme1oo04/projetos_python/tree/main/Dashboard-rank-nba" target={"_blank"}>Projeto no Github</a>
                        </div>
                        <img src={Dashboard}/>
                    </div>
                    <div className="projeto">
                        <div className="info">
                            <h2>Audio Downloader</h2>
                            <p>Esse projeto é um pequeno aplicativo que retira o aúdio tanto de vídeos baixados quanto de vídeos do youtube, depois faz o download.</p>
                            <a href="https://github.com/Guilherme1oo04/projetos_python/tree/main/audioDownloader" target={"_blank"}>Projeto no Github</a>
                        </div>
                        <img src={AudioDown}/>
                    </div>
                </div>
            </main>
        </div>
    )
}

export default Guilherme