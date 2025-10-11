import "../assets/css/main.scss";
import GlobalScrollHandler from "./modules/GlobalScrollHandler";
import Particle from "./modules/Particle";
import HeroScript from "./modules/HeroScript";

gsap.registerPlugin(
  ScrollTrigger,
  ScrollSmoother,
  ScrollToPlugin,
  DrawSVGPlugin
);

const particle = new Particle();
const fronPage = new GlobalScrollHandler();
const gsapAnimation = new HeroScript();
