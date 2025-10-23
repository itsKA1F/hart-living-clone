import { Search, Heart, Menu } from "lucide-react";
import { Button } from "@/components/ui/button";
import { CartDrawer } from "@/components/CartDrawer";

const Header = () => {
  return (
    <header className="sticky top-0 z-50 w-full border-b bg-primary">
      <div className="container mx-auto flex h-16 items-center justify-between px-4">
        <div className="flex items-center gap-8">
          <a href="/" className="text-2xl font-bold tracking-wider text-primary-foreground">
            HART
          </a>
          <nav className="hidden md:flex items-center gap-6">
            <a href="#category" className="text-sm text-primary-foreground hover:text-secondary transition-colors">
              Shop by Category
            </a>
            <a href="#room" className="text-sm text-primary-foreground hover:text-secondary transition-colors">
              Shop by Room
            </a>
            <a href="#about" className="text-sm text-primary-foreground hover:text-secondary transition-colors">
              About Us
            </a>
            <a href="#contact" className="text-sm text-primary-foreground hover:text-secondary transition-colors">
              Contact Us
            </a>
          </nav>
        </div>
        
        <div className="flex items-center gap-4">
          <Button variant="ghost" size="icon" className="text-primary-foreground hover:bg-primary/90">
            <Search className="h-5 w-5" />
          </Button>
          <Button variant="ghost" size="icon" className="text-primary-foreground hover:bg-primary/90">
            <Heart className="h-5 w-5" />
          </Button>
          <CartDrawer />
          <Button variant="ghost" size="icon" className="md:hidden text-primary-foreground hover:bg-primary/90">
            <Menu className="h-5 w-5" />
          </Button>
        </div>
      </div>
    </header>
  );
};

export default Header;
