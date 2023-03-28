import React from "react"
import ImgServices from "../assets/ImagemServicos.png"
import ImgServiceRedes from "../assets/ImagemServicoRedes.png"
import ImgServiceSoftware from "../assets/ImagemServicoSoftware.png"

const Services = () => {
    return(
        <div>
            <main className="services">
        <div className="inicio">
            <div>
                <h1>SOLID Technology</h1>
                <h2>Sua empresa mais moderna e funcional</h2>
                <p>Abrangemos diversos serviços relacionados à ambientes de trabalho mais modernos, além de proporcionar aquilo que pode ser o diferencial para sua empresa, um website de acordo com suas necessidades.</p>
                <p>Confira abaixo os serviços que disponibilizamos.</p>
            </div>
            <div className="img-service">
                <img src={ImgServices} />
            </div>
        </div>
        <div className="ambientes">
            <div className="img-service">
                <img src={ImgServiceRedes} />
            </div>
            <div>
                <h2>Um ambiente de escritório funcional e moderno</h2>
                <p>Realizamos a instalação de equipamentos de redes, como Switch, Hub, Roteadores, além de montarmos o ambiente de computadores conectados à esses aparelhos.</p>
                <p>O local de trabalho se mantém organizado e limpo devido á instalação correta, buscando esconder fios, equipamentos, entre outros.</p>
            </div>
        </div>
        <div className="ambientes" id="ultimoAmbiente">
            <div>
                <h2>Softwares moldados para sua empresa</h2>
                <p>Ferramentas e programas que são criados para facilitar trabalhos diários e repetitivos que são comuns em ambientes de escritório, bem como possibilitar um aumento de produtividade.</p>
                <p>É disponibilizado um treinamento para os funcionários aprenderem a utilizá-lo.</p>
            </div>
            <div className="img-service">
                <img src={ImgServiceSoftware} />
            </div>
        </div>
    </main>
        </div>
    )
}

export default Services