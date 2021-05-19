import Footer from "./Footer";
import Navbar from "./Navbar";

const Layout = props => {
  const { children } = props;
  return (
    <>
      <Navbar />
      {children}
      <Footer />
    </>
  );
};
export default Layout;
