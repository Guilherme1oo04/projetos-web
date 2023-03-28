import './App.css';
import {Routes, Route} from 'react-router-dom'
import Menu from './components/Menu';
import Logo1 from './assets/LogoNome.png'
import Services from './components/Services'
import Contact from './components/Contact'
import QuemSomos from './components/QuemSomos'
import Guilherme from './components/Guilherme'
import Gloria from './components/Gloria'

function App() {
  return (
    <div className="App">
      <Menu imagem={Logo1}/>
      <Routes>
        <Route Component={Services} path="/" exact/>
        <Route Component={Contact} path="/contact"/>
        <Route Component={QuemSomos} path="/quem-somos"/>
        <Route Component={Guilherme} path="/portifolio-guilherme"/>
        <Route Component={Gloria} path="/portifolio-gloria"/>
      </Routes>
    </div>
  );
}

export default App;
