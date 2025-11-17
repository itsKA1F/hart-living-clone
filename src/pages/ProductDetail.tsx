import { useParams, useNavigate } from "react-router-dom";
import { ArrowLeft, ShoppingCart, Heart, Minus, Plus } from "lucide-react";
import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Card } from "@/components/ui/card";
import { useCart } from "@/contexts/CartContext";
import { products } from "@/data/products";
import Header from "@/components/Header";
import Footer from "@/components/Footer";

const ProductDetail = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const { addToCart } = useCart();
  const [quantity, setQuantity] = useState(1);

  const product = products.find((p) => p.id === Number(id));

  if (!product) {
    return (
      <div className="min-h-screen bg-background">
        <Header />
        <div className="container mx-auto px-4 py-16 text-center">
          <h1 className="text-2xl font-bold mb-4">Product not found</h1>
          <Button onClick={() => navigate("/")}>Return to Home</Button>
        </div>
        <Footer />
      </div>
    );
  }

  const handleAddToCart = () => {
    for (let i = 0; i < quantity; i++) {
      addToCart(product);
    }
  };

  return (
    <div className="min-h-screen bg-background">
      <Header />
      <main className="container mx-auto px-4 py-8">
        <Button
          variant="ghost"
          className="mb-6 -ml-4"
          onClick={() => navigate("/")}
        >
          <ArrowLeft className="mr-2 h-4 w-4" />
          Back to Products
        </Button>

        <div className="grid md:grid-cols-2 gap-8 lg:gap-12">
          {/* Product Image */}
          <div className="relative">
            <div className="aspect-square rounded-lg overflow-hidden bg-muted/20">
              {product.soldOut && (
                <Badge className="absolute left-4 top-4 z-10 bg-muted text-muted-foreground">
                  Sold Out
                </Badge>
              )}
              {product.sale && (
                <Badge className="absolute left-4 top-4 z-10 bg-secondary">
                  Sale
                </Badge>
              )}
              <img
                src={product.image}
                alt={product.name}
                className="h-full w-full object-cover"
              />
            </div>
          </div>

          {/* Product Info */}
          <div className="flex flex-col">
            <div className="mb-2">
              <p className="text-sm text-muted-foreground">{product.category}</p>
            </div>
            
            <h1 className="text-3xl md:text-4xl font-bold text-foreground mb-4">
              {product.name}
            </h1>

            <div className="flex items-center gap-3 mb-6">
              {product.originalPrice && (
                <span className="text-xl text-muted-foreground line-through">
                  ${product.originalPrice.toLocaleString()}
                </span>
              )}
              <span className="text-3xl font-bold text-primary">
                ${product.price.toLocaleString()}
              </span>
            </div>

            <p className="text-muted-foreground mb-6 leading-relaxed">
              {product.description}
            </p>

            {/* Product Details */}
            <Card className="p-4 mb-6">
              <div className="space-y-3">
                {product.dimensions && (
                  <div className="flex justify-between">
                    <span className="font-medium">Dimensions:</span>
                    <span className="text-muted-foreground">{product.dimensions}</span>
                  </div>
                )}
                {product.material && (
                  <div className="flex justify-between">
                    <span className="font-medium">Material:</span>
                    <span className="text-muted-foreground">{product.material}</span>
                  </div>
                )}
                {product.colors && product.colors.length > 0 && (
                  <div className="flex justify-between">
                    <span className="font-medium">Available Colors:</span>
                    <span className="text-muted-foreground">
                      {product.colors.join(", ")}
                    </span>
                  </div>
                )}
              </div>
            </Card>

            {/* Quantity Selector */}
            {!product.soldOut && (
              <div className="mb-6">
                <label className="block text-sm font-medium mb-2">Quantity</label>
                <div className="flex items-center gap-4">
                  <Button
                    variant="outline"
                    size="icon"
                    onClick={() => setQuantity(Math.max(1, quantity - 1))}
                  >
                    <Minus className="h-4 w-4" />
                  </Button>
                  <span className="text-xl font-semibold w-12 text-center">
                    {quantity}
                  </span>
                  <Button
                    variant="outline"
                    size="icon"
                    onClick={() => setQuantity(quantity + 1)}
                  >
                    <Plus className="h-4 w-4" />
                  </Button>
                </div>
              </div>
            )}

            {/* Action Buttons */}
            <div className="flex gap-3 mt-auto">
              {!product.soldOut ? (
                <Button
                  className="flex-1"
                  size="lg"
                  onClick={handleAddToCart}
                >
                  <ShoppingCart className="mr-2 h-5 w-5" />
                  Add to Cart
                </Button>
              ) : (
                <Button className="flex-1" size="lg" disabled>
                  Out of Stock
                </Button>
              )}
              <Button variant="outline" size="icon" className="h-11 w-11">
                <Heart className="h-5 w-5" />
              </Button>
            </div>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
};

export default ProductDetail;
