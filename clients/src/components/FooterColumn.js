import style from "./Footer.module.css";

const FooterColumn = props => {
  const { title, text1, text2, text3, text4, text5 } = props;
  return (
    <>
      <div>
        <h4 className={style.title}>{title}</h4>
        <div className={`${style.desc}`}>
          <p>{text1}</p>
          <p>{text2}</p>
          <p>{text3}</p>
          <p>{text4}</p>
          <p>{text5}</p>
        </div>
      </div>
    </>
  );
};
export default FooterColumn;
