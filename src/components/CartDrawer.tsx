import { ShoppingCart, X, Plus, Minus, Trash2 } from "lucide-react";
import { Button } from "@/components/ui/button";
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerFooter,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from "@/components/ui/drawer";
import { useCart } from "@/contexts/CartContext";
import { Badge } from "@/components/ui/badge";
import { Link } from "react-router-dom";

export function CartDrawer() {
  const { cart, updateQuantity, removeFromCart, getCartTotal, getCartCount, clearCart } = useCart();

  return (
    <Drawer>
      <DrawerTrigger asChild>
        <Button variant="ghost" size="icon" className="relative text-primary-foreground hover:bg-primary/90">
          <ShoppingCart className="h-5 w-5" />
          {getCartCount() > 0 && (
            <Badge className="absolute -right-1 -top-1 h-5 w-5 rounded-full p-0 flex items-center justify-center text-xs bg-secondary">
              {getCartCount()}
            </Badge>
          )}
        </Button>
      </DrawerTrigger>
      <DrawerContent className="max-h-[85vh]">
        <DrawerHeader className="border-b">
          <div className="flex items-center justify-between">
            <DrawerTitle>Shopping Cart ({getCartCount()})</DrawerTitle>
            <DrawerClose asChild>
              <Button variant="ghost" size="icon">
                <X className="h-4 w-4" />
              </Button>
            </DrawerClose>
          </div>
        </DrawerHeader>

        <div className="flex-1 overflow-y-auto p-6">
          {cart.length === 0 ? (
            <div className="flex flex-col items-center justify-center py-12 text-center">
              <ShoppingCart className="h-16 w-16 text-muted-foreground mb-4" />
              <p className="text-lg font-medium text-muted-foreground">Your cart is empty</p>
              <p className="text-sm text-muted-foreground mt-2">Add items to get started</p>
            </div>
          ) : (
            <div className="space-y-4">
              {cart.map((item) => (
                <div key={item.id} className="flex gap-4 pb-4 border-b last:border-0">
                  <img
                    src={item.image}
                    alt={item.name}
                    className="h-24 w-24 rounded-lg object-cover bg-muted"
                  />
                  <div className="flex-1 min-w-0">
                    <h3 className="font-semibold text-foreground truncate">{item.name}</h3>
                    <p className="text-lg font-bold text-primary mt-1">
                      ${item.price.toLocaleString()}
                    </p>
                    <div className="flex items-center gap-2 mt-2">
                      <Button
                        variant="outline"
                        size="icon"
                        className="h-8 w-8"
                        onClick={() => updateQuantity(item.id, item.quantity - 1)}
                      >
                        <Minus className="h-3 w-3" />
                      </Button>
                      <span className="w-8 text-center font-medium">{item.quantity}</span>
                      <Button
                        variant="outline"
                        size="icon"
                        className="h-8 w-8"
                        onClick={() => updateQuantity(item.id, item.quantity + 1)}
                      >
                        <Plus className="h-3 w-3" />
                      </Button>
                      <Button
                        variant="ghost"
                        size="icon"
                        className="h-8 w-8 ml-auto text-destructive hover:text-destructive"
                        onClick={() => removeFromCart(item.id)}
                      >
                        <Trash2 className="h-4 w-4" />
                      </Button>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          )}
        </div>

        <DrawerFooter className="border-t">
          {cart.length > 0 && (
            <>
              <div className="flex items-center justify-between text-lg font-bold mb-4">
                <span>Total:</span>
                <span className="text-primary">${getCartTotal().toLocaleString()}</span>
              </div>
              <Link to="/cart" className="w-full block">
                <DrawerClose asChild>
                  <Button className="w-full mb-2" size="lg">
                    View Cart
                  </Button>
                </DrawerClose>
              </Link>
              <Button variant="outline" className="w-full" onClick={clearCart}>
                Clear Cart
              </Button>
            </>
          )}
        </DrawerFooter>
      </DrawerContent>
    </Drawer>
  );
}
