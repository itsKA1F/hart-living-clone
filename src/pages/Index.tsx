import Header from "@/components/Header";
import Hero from "@/components/Hero";
import ShopByRoom from "@/components/ShopByRoom";
import ShopByCategory from "@/components/ShopByCategory";
import TopPicks from "@/components/TopPicks";
import Footer from "@/components/Footer";

const Index = () => {
  return (
    <div className="min-h-screen bg-background">
      <Header />
      <Hero />
      <ShopByRoom />
      <ShopByCategory />
      <TopPicks />
      <Footer />
    </div>
  );
};

export default Index;
