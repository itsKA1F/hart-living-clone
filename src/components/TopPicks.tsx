import { Heart, ShoppingCart } from "lucide-react";
import { Link } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { useCart } from "@/contexts/CartContext";
import { products } from "@/data/products";

const TopPicks = () => {
  const { addToCart } = useCart();

  return (
    <section className="py-16 bg-background">
      <div className="container mx-auto px-4">
        <div className="mb-8 flex items-center justify-between">
          <h2 className="text-3xl font-bold text-foreground">Top Picks</h2>
          <a href="#" className="text-sm text-primary hover:text-secondary transition-colors">
            See All
          </a>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {products.map((product) => (
            <div key={product.id} className="group relative overflow-hidden rounded-lg bg-card transition-all hover:shadow-lg">
              <Link to={`/product/${product.id}`}>
                <div className="relative aspect-square overflow-hidden bg-muted/20 cursor-pointer">
                {product.soldOut && (
                  <Badge className="absolute left-3 top-3 z-10 bg-muted text-muted-foreground">
                    Sold Out
                  </Badge>
                )}
                {product.sale && (
                  <Badge className="absolute left-3 top-3 z-10 bg-secondary">
                    Sale
                  </Badge>
                )}
                <img
                  src={product.image}
                  alt={product.name}
                  className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <Button
                  size="icon"
                  variant="ghost"
                  className="absolute right-3 top-3 z-10 bg-background/80 hover:bg-background"
                >
                  <Heart className="h-4 w-4" />
                </Button>
                </div>
              </Link>
              <div className="p-4">
                <p className="mb-1 text-xs text-muted-foreground">{product.category}</p>
                <h3 className="mb-2 font-semibold text-foreground line-clamp-2">{product.name}</h3>
                <div className="flex items-center justify-between gap-2">
                  <div className="flex items-center gap-2">
                    {product.originalPrice && (
                      <span className="text-sm text-muted-foreground line-through">
                        ${product.originalPrice.toLocaleString()}
                      </span>
                    )}
                    <span className="text-lg font-bold text-primary">
                      ${product.price.toLocaleString()}
                    </span>
                  </div>
                  {!product.soldOut && (
                    <Button
                      size="icon"
                      onClick={() => addToCart(product)}
                    >
                      <ShoppingCart className="h-4 w-4" />
                    </Button>
                  )}
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default TopPicks;
