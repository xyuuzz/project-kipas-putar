/* eslint-disable no-restricted-globals */
import { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";
import Putih from "../img/Kipas Putar Putih.svg";
import Hitam from "../img/Kipas Putar.svg";

import style from "./Navbar.module.css";

const Navbar = () => {
  const [logo, setLogo] = useState(Putih);
  const [shrink, setShrink] = useState("");
  const [navTheme, setNavTheme] = useState("navbar-dark");
  const [btnTheme, setBtnTheme] = useState("btn-outline-light");

  useEffect(() => {
    function getWidth() {
      if (self.innerWidth) return self.innerWidth;
      if (document.documentElement && document.documentElement.clientWidth)
        return document.documentElement.clientWidth;

      if (document.body) return document.body.clientWidth;
    }

    if (getWidth() < 579) {
      setShrink(style.shrink);
      setNavTheme("navbar-light");
      setBtnTheme("btn-outline-dark");
      return;
    }

    window.addEventListener("scroll", () => {
      // ketika di scroll kebawah
      if (window.scrollY > 20) {
        // tambah kelas shrink
        setShrink(style.shrink);
        setNavTheme("navbar-light");
        setBtnTheme("btn-outline-dark");
        setLogo(Hitam);
      } else {
        // hapus kelas shrink
        setShrink("");
        setNavTheme("navbar-dark");
        setBtnTheme("btn-outline-light");
        setLogo(Putih);
      }
    });
  }, []);

  return (
    <>
      <nav
        className={`${shrink} ${style.navbar} ${navTheme} navbar navbar-expand-lg fixed-top`}
      >
        <div className={`${style.wrapNav} container`}>
          <NavLink className={` navbar-brand`} to="/home">
            <img src={logo} alt="Kipas Putar" />
          </NavLink>
          <div
            className="collapse navbar-collapse justify-content-end "
            id="navbarNavAltMarkup"
          >
            <div className="navbar-nav d-flex align-items-center">
              <NavLink className="nav-link" aria-current="page" to="/">
                Baca
              </NavLink>
              <NavLink className="nav-link" to="/make/article">
                Buat
              </NavLink>
              <NavLink className="nav-link" to="/home">
                Tentang
              </NavLink>
              <NavLink className="nav-link" to="#">
                <button className={`btn ${btnTheme} ${style.btnRadius}`}>
                  Login
                </button>
              </NavLink>
            </div>
          </div>
        </div>
      </nav>
    </>
  );
};
export default Navbar;
