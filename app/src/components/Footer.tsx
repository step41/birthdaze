type FooterProps = {
  year: number,
  company: string
};

const Footer = ({ year, company }: FooterProps) => {
  return (
    <footer id="footer">
        <small>&copy; { year } { company }. All rights reserved.</small>
    </footer>
  );
}

export default Footer;