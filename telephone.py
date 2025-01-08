

class Node:
    def __init__(self):
        self.name = ""
        self.tel = 0
        self.id = 0

class Hashing:
    def __init__(self):
        self.data = [Node() for _ in range(100)]
        self.n = ""
        self.t = 0
        self.i = 0
        self.index = 0

    def create_record(self, size):
        self.i = 4
        self.n = "XYZ Gupta"
        self.t = 23451234
        print("\nEnter id :", "\t\t\t", self.i)
        print("\nEnter name :", "\t\t\t", self.n)
        print("\nEnter telephone number :\t", self.t)
        self.index = self.i % size
        for _ in range(size):
            if self.data[self.index].id == 0:
                self.data[self.index].id = self.i
                self.data[self.index].name = self.n
                self.data[self.index].tel = self.t
                break
            else:
                self.index = (self.index + 1) % size

    def search_record(self, size):
        key = 4
        print("\nEnter record id to search :", key)
        index = key % size
        for _ in range(size):
            if self.data[index].id == key:
                print("\nRecord found:")
                print("\tID\tNAME\t\tTELEPHONE")
                print("\t", self.data[index].id, "\t", self.data[index].name, "\t", self.data[index].tel)
                return
            else:
                index = (index + 1) % size
        print("\nRecord not found")

    def delete_record(self, size):
        key = 4
        print("\nEnter record id to delete :", key)
        index = key % size
        for _ in range(size):
            if self.data[index].id == key:
                self.data[index].id = 0
                self.data[index].name = ""
                self.data[index].tel = 0
                print("\nRecord deleted successfully")
                return
            else:
                index = (index + 1) % size
        print("\nRecord not found")

    def update_record(self, size):
        key = 4
        print("\nEnter record id to update :", key)
        index = key % size
        for _ in range(size):
            if self.data[index].id == key:
                self.data[index].name = "XYZ Agarwal"
                self.data[index].tel = 23413421
                print("\nEnter name:\t\t\t", self.data[index].name)
                print("\nEnter telephone number:\t", self.data[index].tel)
                print("\nDetails updated:")
                print("\tID\tNAME\t\tTELEPHONE")
                print("\t", self.data[index].id, "\t", self.data[index].name, "\t", self.data[index].tel)
                return
            else:
                index = (index + 1) % size
        print("\nRecord not found")

    def display_record(self, size):
        print("\n\tID\tNAME\t\tTELEPHONE")
        for a in range(size):
            if self.data[a].id != 0:
                print("\t", self.data[a].id, "\t", self.data[a].name, "\t", self.data[a].tel)


def main():
    size = 20
    s = Hashing()

    print("\n1.CREATE record")
    s.create_record(size)

    print("\n\n\n\n2.DISPLAY record")
    s.display_record(size)

    print("\n\n\n\n3.SEARCH record")
    s.search_record(size)

    print("\n\n\n\n4.UPDATE record")
    s.update_record(size)

    print("\n\n\n\n5.DELETE record")
    s.delete_record(size)


if __name__ == "__main__":
    main()
