import Spinner from "../img/kipas spin.svg";
import style from "./Loading.module.css";

const Loading = () => (
  <>
    <div className={`${style.wrap}`}>
      <img
        src={Spinner}
        alt="loading..."
        width="100px"
        className={`${style.loading} `}
      />
    </div>
  </>
);

export default Loading;
