import style from "./Hero.module.css";

const Hero = ({
  image,
  title1,
  title2,
  textAlign,
  fontStyle,
  letterSpacing,
}) => {
  return (
    <>
      <section
        id={"top"}
        className={`${style.idHero}`}
        style={{
          backgroundImage: `url(${image})`,
        }}
      >
        <h1
          style={{ textAlign, fontStyle, letterSpacing }}
          className="container"
        >
          {title1}
          <br />
          {title2}
        </h1>
      </section>
    </>
  );
};

export default Hero;
