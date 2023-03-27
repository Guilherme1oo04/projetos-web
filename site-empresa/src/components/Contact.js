import React from "react"
import Email from "../assets/email.png"
import Linkedin from "../assets/linkedin.png"
import Instagram from "../assets/instagram.png"
import Facebook from "../assets/facebook.png"
import Celular from "../assets/celular.png"

const Contact = () => {
    return(
        <div>
            <main className="contact">
                <h1>Entre em contato conosco</h1>
                <div className="card">
                    <div>
                        <div className="contatos">
                            <img src={Email} />
                            <h2>solid.technology.com.br</h2>
                        </div>
                        <div className="contatos">
                            <img src={Linkedin} />
                            <h2>SOLID technology</h2>
                        </div>
                        <div className="contatos">
                            <img src={Instagram} />
                            <h2>@solid_tech</h2>
                        </div>
                        <div className="contatos">
                            <img src={Facebook} />
                            <h2>SOLID Technology</h2>
                        </div>
                    </div>
                    <div className="celular">
                        <img src={Celular} />
                    </div>
                </div>
            </main>
        </div>
    )
}

export default Contact