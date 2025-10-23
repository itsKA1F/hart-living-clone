import chairImg from "@/assets/chair-product.jpg";
import tableImg from "@/assets/table-product.jpg";
import sofaImg from "@/assets/sofa-product.jpg";
import diningTableImg from "@/assets/dining-table-product.jpg";

export interface Product {
  id: number;
  name: string;
  category: string;
  price: number;
  originalPrice?: number;
  image: string;
  soldOut?: boolean;
  sale?: boolean;
  description: string;
  dimensions?: string;
  material?: string;
  colors?: string[];
}

export const products: Product[] = [
  {
    id: 1,
    name: "Cagliari Rich Black Side Table",
    category: "Side Table",
    price: 350,
    image: tableImg,
    soldOut: true,
    description: "A stunning side table featuring a rich black finish that adds sophistication to any room. Perfect for displaying decorative items or keeping essentials within reach.",
    dimensions: "20\" W x 20\" D x 24\" H",
    material: "Solid Oak with Black Stain",
    colors: ["Black"],
  },
  {
    id: 2,
    name: "Knoll Cloud White Resting Chair",
    category: "Arm Chairs",
    price: 600,
    image: chairImg,
    description: "Experience ultimate comfort with this cloud-white resting chair. Its ergonomic design and plush cushioning make it perfect for reading, relaxing, or entertaining guests.",
    dimensions: "32\" W x 34\" D x 36\" H",
    material: "Premium Fabric with Solid Wood Frame",
    colors: ["Cloud White", "Light Gray"],
  },
  {
    id: 3,
    name: "Beja Smokey Grey Cozy L Sofa",
    category: "Sectional Sofas",
    price: 1500,
    originalPrice: 1800,
    image: sofaImg,
    sale: true,
    description: "Transform your living space with this luxurious L-shaped sectional sofa in smokey grey. Spacious seating and modern design make it ideal for family gatherings and entertaining.",
    dimensions: "110\" W x 85\" D x 32\" H",
    material: "High-Quality Linen Blend with Hardwood Frame",
    colors: ["Smokey Grey", "Charcoal", "Light Beige"],
  },
  {
    id: 4,
    name: "Alba Minimalist White Dining Table",
    category: "Dining Table",
    price: 1100,
    image: diningTableImg,
    soldOut: true,
    description: "A beautiful minimalist dining table in pristine white that seats up to 6 people comfortably. Its clean lines and timeless design complement any dining room aesthetic.",
    dimensions: "72\" W x 36\" D x 30\" H",
    material: "Engineered Wood with White Lacquer Finish",
    colors: ["White"],
  },
];
