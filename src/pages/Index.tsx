import Header from "@/components/Header";
import Hero from "@/components/Hero";
import ShopByCategory from "@/components/ShopByCategory";
import TopPicks from "@/components/TopPicks";
import Footer from "@/components/Footer";

const Index = () => {
  return (
    <div className="min-h-screen bg-background">
      <Header />
      <Hero />
      <ShopByCategory />
      <TopPicks />
      <Footer />
    </div>
  );
};

export default Index;
