import bedroomImg from "@/assets/bedroom.jpg";
import diningRoomImg from "@/assets/dining-room.jpg";
import livingRoomImg from "@/assets/living-room.jpg";
import outdoorImg from "@/assets/outdoor.jpg";

const rooms = [
  { name: "Bedroom", image: bedroomImg },
  { name: "Dining Room", image: diningRoomImg },
  { name: "Living Room", image: livingRoomImg },
  { name: "Outdoors", image: outdoorImg },
];

const ShopByRoom = () => {
  return (
    <section id="room" className="py-16 bg-background">
      <div className="container mx-auto px-4">
        <div className="mb-8 flex items-center justify-between">
          <h2 className="text-3xl font-bold text-foreground">Shop by Room</h2>
          <a href="#" className="text-sm text-primary hover:text-secondary transition-colors">
            See All
          </a>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {rooms.map((room) => (
            <a
              key={room.name}
              href="#"
              className="group relative overflow-hidden rounded-lg bg-card transition-all hover:shadow-lg"
            >
              <div className="aspect-[4/3] overflow-hidden">
                <img
                  src={room.image}
                  alt={room.name}
                  className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
              </div>
              <div className="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent" />
              <div className="absolute bottom-0 left-0 right-0 p-4">
                <h3 className="text-xl font-semibold text-white">{room.name}</h3>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ShopByRoom;
