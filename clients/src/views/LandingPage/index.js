import { useEffect } from "react";
import style from "./LandingPage.module.css";
import Hero from "../../components/Hero";

export default function LandingPage() {
  useEffect(() => {
    document.title = "Kipas Putar | Tempat baca ";
  }, []);

  return (
    <>
      <Hero
        image={`${process.env.PUBLIC_URL}Background%20Landing.png`}
        title1="Kipas Putar Maspion"
        title2="Bangga Buatan Anak Negri"
      />
      <section id={"artikel"} className={style.idArticle}></section>
    </>
  );
}
