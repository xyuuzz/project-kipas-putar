import style from "./Hero.module.css";

const Hero = ({ image, title1, title2 }) => {
  return (
    <>
      <section
        id={"top"}
        className={style.idHero}
        style={{ backgroundImage: `url(${image})` }}
      >
        <h1>
          {title1}
          <br />
          {title2}
        </h1>
      </section>
    </>
  );
};

export default Hero;
