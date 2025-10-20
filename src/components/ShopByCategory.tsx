import { Bed, Sofa, Armchair, Table2, Lamp, Box } from "lucide-react";

const categories = [
  { name: "Beds", icon: Bed },
  { name: "Sofas", icon: Sofa },
  { name: "Chairs", icon: Armchair },
  { name: "Tables", icon: Table2 },
  { name: "Consoles", icon: Box },
  { name: "Lamps", icon: Lamp },
];

const ShopByCategory = () => {
  return (
    <section id="category" className="py-16 bg-muted/30">
      <div className="container mx-auto px-4">
        <div className="mb-8 flex items-center justify-between">
          <h2 className="text-3xl font-bold text-foreground">Shop by Category</h2>
          <a href="#" className="text-sm text-primary hover:text-secondary transition-colors">
            See All
          </a>
        </div>
        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
          {categories.map((category) => {
            const Icon = category.icon;
            return (
              <a
                key={category.name}
                href="#"
                className="group flex flex-col items-center gap-4 rounded-lg bg-card p-6 transition-all hover:bg-[hsl(var(--card-hover))] hover:shadow-md"
              >
                <div className="flex h-16 w-16 items-center justify-center rounded-full bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-primary-foreground">
                  <Icon className="h-8 w-8" />
                </div>
                <h3 className="text-center text-sm font-semibold text-foreground">{category.name}</h3>
              </a>
            );
          })}
        </div>
      </div>
    </section>
  );
};

export default ShopByCategory;
