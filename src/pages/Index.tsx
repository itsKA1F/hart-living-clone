import Header from "@/components/Header";
import Hero from "@/components/Hero";
import ShopByRoom from "@/components/ShopByRoom";
import ShopByCategory from "@/components/ShopByCategory";
import TopPicks from "@/components/TopPicks";
import Footer from "@/components/Footer";
import { CartProvider } from "@/hooks/use-cart";

const Index = () => {
  return (
    <CartProvider>
      <div className="min-h-screen bg-background">
        <Header />
        <Hero />
        <ShopByRoom />
        <ShopByCategory />
        <TopPicks />
        <Footer />
      </div>
    </CartProvider>
  );
};

export default Index;
