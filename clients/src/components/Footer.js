import FooterColumn from "./FooterColumn";

import style from "./Footer.module.css";
import LogoKipas from "../img/Kipas Footer.svg";

const Footer = () => {
  return (
    <>
      <section id={style.footer}>
        <div className={`${style.footerWrap} container`}>
          <div className={`${style.footer1}`}>
            <img src={LogoKipas} alt="Kipas Putar" />
          </div>
          <div className={`${style.footer2} ${style.footerColumn}`}>
            <FooterColumn
              title="Dukungan"
              text1="FAQ"
              text2="Hubungi Kami"
              text3="Kebijakan Privasi"
            />
          </div>
          <div className={`${style.footer3} ${style.footerColumn}`}>
            <FooterColumn
              title="Blog"
              text1="Trending"
              text2="Teknologi"
              text3="Pendidikan"
              text4="Kesehatan"
              text5="Olahraga"
            />
          </div>
          <div className={`${style.footer4} ${style.footerColumn}`}>
            <FooterColumn
              title="Ikuti"
              text1="Instagram"
              text2="Twitter"
              text3="Linkedin"
              text4="Facebook"
            />
          </div>
        </div>
      </section>
    </>
  );
};
export default Footer;
